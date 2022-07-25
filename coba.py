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
        db='coba_sistem',
        )
    sql=("SELECT nilai_ttf FROM temp1")
    cur = conn.cursor()
      
    # Select query
    cur.execute(sql)
    rows = list(cur.fetchall())
    
    data = [row[0] for row in rows]

    hasil = Fit_Everything(failures=data, print_results=False, show_histogram_plot=False, show_probability_plot=False, show_PP_plot=False, show_best_distribution_probability_plot=False, exclude=["Lognormal_3P", "Weibull_CR", "Weibull_3P", "Gamma_3P", "Gamma_2P", "Gumbel_2P", "Beta_2P", "Weibull_Mixture", "Weibull_DS", "Loglogistic_2P", "Loglogistic_3P", "Exponential_1P"])
    #output = Fit_Everything(data)
    #fit all the models
    print('The best fitting distribution was', hasil.best_distribution_name, 'which had parameters', hasil.best_distribution.parameters)



   # To close the connection
    conn.close()
  
# Driver Code
if __name__ == "__main__" :
    mysqlconnect()
