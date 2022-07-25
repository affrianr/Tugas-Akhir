#!/usr/bin/env python
from reliability.Fitters import Fit_Everything

import numpy as np
import math
import pymysql
  
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
    rows = list(cur.fetchall())
    
    data = [row[0] for row in rows]

    hasil = Fit_Everything(failures=data, show_histogram_plot=False, show_probability_plot=False, show_PP_plot=False, show_best_distribution_probability_plot=False, exclude=["Weibull_CR"])
    #output = Fit_Everything(data)
    #fit all the models
    print('The best fitting distribution was', hasil.best_distribution_name, 'which had parameters', hasil.best_distribution.parameters)



   # To close the connection
    conn.close()
  
# Driver Code
if __name__ == "__main__" :
    mysqlconnect()
