# importing pandas as pd
import pandas as pd
  
# read an excel file and convert 
# into a dataframe object
df = pd.DataFrame(pd.read_excel("C:/Users/Tammy/Documents/GMU Spring 2022/Due Dates 2022.xlsx"))
  
# show the dataframe
print(df)