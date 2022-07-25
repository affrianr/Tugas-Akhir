from reliability.Fitters import Fit_Everything

data = [3426.43,1122.77,5392.00,1892.00,2781.00]
# data = [58,75,36,52,63,65,22,17,28,64,23,40,73,45,52,36,52,60,13,55,82,55,34,57,23,42,66,35,34,25]
results = Fit_Everything(failures=data, show_histogram_plot=False, show_probability_plot=False, show_PP_plot=False, show_best_distribution_probability_plot=False)
output = Fit_Everything(data)
# fit all the models
print('The best fitting distribution was', results.best_distribution_name, 'which had parameters', results.best_distribution.parameters)