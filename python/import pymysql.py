import pymysql
import numpy as np
from pprint import pprint  
def mysqlconnect():
    # To connect MySQL database
    conn = pymysql.connect(
        host='localhost',
        user='root', 
        password = "",
        db='baru',
        )
      
    cur = conn.cursor()
      
    # Select query
    cur.execute("select TTF from cobadata")
    rows = np.array(cur.fetchall())
      
    result_list = [row[0] for row in rows]

    print (result_list)

   # To close the connection
    conn.close()
  
# Driver Code
if __name__ == "__main__" :
    mysqlconnect()