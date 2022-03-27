<?php

/**
 * Patient data template.
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    Kevin Yeh <kevin.y@integralemr.com>
 * @author    Brady Miller <brady.g.miller@gmail.com>
 * @author    Robert Down <robertdown@live.com>
 * @author    Jerry Padgett <sjpadgett@gmail.com>
 * @author    Ranganath Pathak <pathak@scrs1.org>
 * @author    Tyler Wrenn <tyler@tylerwrenn.com>
 * @copyright Copyright (c) 2016 Kevin Yeh <kevin.y@integralemr.com>
 * @copyright Copyright (c) 2016 Brady Miller <brady.g.miller@gmail.com>
 * @copyright Copyright (c) 2017-2022 Robert Down <robertdown@live.com>
 * @copyright Copyright (c) 2018 Jerry Padgett <sjpadgett@gmail.com>
 * @copyright Copyright (c) 2019 Ranganath Pathak <pathak@scrs1.org>
 * @copyright Copyright (c) 2020 Tyler Wrenn <tyler@tylerwrenn.com>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

?>
<?php

$search_any_type = $GLOBALS['search_any_patient'];

//Modes for search box :comprehensive, dual, fixed and the default is none
switch ($search_any_type) {
    case 'dual':
        $any_search_class = "any-search-legacy";
        $search_globals_class = "btn-globals-legacy";
        break;
    case 'comprehensive':
        $any_search_class = "any-search-modern";
        $search_globals_class = "btn-globals-modern";
        break;
    case 'fixed':
        $any_search_class = "any-search-fixed";
        $search_globals_class = "btn-globals-fixed";
        break;
    default:
        $any_search_class = "any-search-none";
        $search_globals_class = "btn-globals-none";
}

?>
<script type="text/html" id="patient-data-template">
    <div class="d-lg-inline-flex w-100">
        <div class="flex-fill">
            <div class="float-left mx-2">
                <!-- ko if: patient -->
                <div data-bind="with: patient" class="patientPicture">
                    <img data-bind="attr: {src: patient_picture}"
                        class="img-thumbnail"
                        onError="this.src = '<?php echo $GLOBALS['images_static_relative']; ?>/patient-picture-default.png'" />
                </div>
                <!-- /ko -->
            </div>
            <div class="form-group">
                <!-- ko if: patient -->
                <a class="ptName btn btn-small btn-info" data-bind="click:refreshPatient,with: patient" href="#" title="<?php echo xla("To Dashboard") ?>">
                    <span data-bind="text: pname()"></span>
                    (<span data-bind="text: pubpid"></span>)
                </a>&ensp;
                <a href="#" class="btn btn-sm btn-warning" data-bind="click:clearPatient" title="<?php echo xla("Clear") ?>">
                    <i class="fa fa-times"></i>
                </a>
                <div>
                    <span data-bind="text:patient().str_dob()"></span>
                </div>
                <!-- /ko -->
            </div>
        </div>

        <div class="flex-column mx-2">
            <!-- ko if: user -->
            <!-- ko with: user -->
            <!-- ko if:messages() -->
            <span class="mr-auto">
                <a class="btn btn-secondary" href="#" data-bind="click: viewMessages"
                    title="<?php echo xla("View Messages"); ?>">
                    <i class="fa fa-envelope"></i>&nbsp;<span class="badge badge-danger" style="display:inline" data-bind="text: messages()"></span>
                </a>
            </span>
            <!-- /ko --><!-- messages -->
            <!-- ko if: portal() -->
            <span class="btn-group dropdown mr-auto">
                <button class="btn btn-secondary dropdown-toggle"
                    type="button" id="portalMsgAlerts"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="true">
                    <?php echo xlt("Portal"); ?>&nbsp;
                    <span class="badge badge-danger" data-bind="text: portalAlerts()"></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="portalMsgAlerts">
                    <li>
                        <a class="dropdown-item" href="#" data-bind="click: viewPortalMail">
                            <i class="fa fa-envelope-o"></i>&nbsp;<?php echo xlt("Portal Mail"); ?>&nbsp;
                            <span class="badge badge-success" style="display:inline" data-bind="text: portalMail()"></span>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="#" data-bind="click: viewPortalAudits">
                            <i class="fa fa-align-justify"></i>&nbsp;<?php echo xlt("Portal Audits"); ?>&nbsp;
                            <span class="badge badge-success" style="display:inline" data-bind="text: portalAudits()"></span>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="#" data-bind="click: viewPortalChats">
                            <i class="fa fa-envelope"></i>&nbsp;<?php echo xlt("Portal Chats"); ?>&nbsp;
                            <span class="badge badge-success" style="display:inline" data-bind="text: portalChats()"></span>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="#" data-bind="click: viewPortalPayments">
                            <i class="fa fa-envelope"></i>&nbsp;<?php echo xlt("Portal Payments"); ?>&nbsp;<span class="badge badge-success" style="display:inline" data-bind="text: portalPayments()"></span>
                        </a>
                    </li>
                </ul>
            </span>
            <!-- /ko --><!-- portal alert -->
            <!-- /ko --><!-- with user -->
            <!-- /ko --><!-- user -->
        </div>
    </div>
</script>