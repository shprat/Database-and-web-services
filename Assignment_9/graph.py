from datetime import datetime

import matplotlib.dates as mdates
import numpy as np
import pandas as pd
import pylab
from matplotlib import pyplot as plt


def page_graph(file_name, show = True, export = False):
    data = pd.read_csv('./data/' + file_name + '.csv', index_col=False)
    ip = data.IP
    brow = data.Browser
    date = data.Time
    dates = [datetime.strptime(d, "%d/%b/%Y:%H:%M:%S") for d in date]
    dates
    # Choose some nice levels
    levels = np.tile([-10, 1, 10, -1, -9, 2, 9, -2, -8, 3],
                     int(np.ceil(len(dates)/10)))[:len(dates)]
    
    # Create figure and plot a stem plot with the date
    fig, ax = plt.subplots(figsize=(20, 8), constrained_layout=True)
    ax.set(title="Timeline")
    
    markerline, stemline, baseline = ax.stem(dates, levels,
                                             linefmt="C3-", basefmt="k-",
                                             use_line_collection=True)
    
    plt.setp(markerline, mec="k", mfc="w", zorder=3)
    
    # Shift the markers to the baseline by replacing the y-data by zeros.
    markerline.set_ydata(np.zeros(len(dates)))
    vert = np.array(['top', 'bottom'])[(levels > 0).astype(int)]
    for d, l, r, r2, va in zip(dates, levels, ip, brow, vert):
        ax.annotate(r+' '+r2, xy=(d, l), xytext=(-3, np.sign(l)*3),
                    textcoords="offset points", va=va, ha="right")
    
    ax.get_xaxis().set_major_locator(mdates.MonthLocator(interval=1))
    ax.get_xaxis().set_major_formatter(mdates.DateFormatter("%d %b %Y"))
    plt.setp(ax.get_xticklabels(), rotation=30, ha="right")
    ax.get_yaxis().set_visible(False)
    for spine in ["left", "top", "right"]:
        ax.spines[spine].set_visible(False)
    
    ax.margins(y=0.1)
    plt.xlabel('Time')
    if export:
    	plt.savefig('./plots/' + file_name+'.png')
    	print('Exported ' + file_name + '.png' + ' in the plot directory')
    if show: plt.show()
    
    #error
    
def error_graph(file_name, show = True, export = False):    
    data = pd.read_csv('./data/' + file_name + '.csv', index_col=False)    
    if data.empty == True:
        return
    client = data.Client
    error = data.Error
    date = data.Time
    dates = [datetime.strptime(d[4:], '%b %d %H:%M:%S %Y') for d in date]
    dates
    #levels
    levels = np.tile([1, -2, 3, -4, 5, -6, 7, -8, 9, -10, 11],
                     int(np.ceil(len(dates)/11)))[:len(dates)]
    # stem plot
    fig, ax = plt.subplots(figsize=(18, 8), constrained_layout=True)
    ax.set(title="Error Timeline")
    markerline, stemline, baseline = ax.stem(dates, levels,
                                             linefmt="C3-", basefmt="k-",
                                             use_line_collection=True)
    plt.setp(markerline, mec="k", mfc="w", zorder=3)
    # shift.
    markerline.set_ydata(np.zeros(len(dates)))
    # annotatation
    vert = np.array(['top', 'bottom'])[(levels > 0).astype(int)]
    for d, l, r, r2, va in zip(dates, levels, client, error, vert):
        ax.annotate(r2+r, xy=(d, l), xytext=(-3, np.sign(l)*3),
                    textcoords="offset points", va=va, ha="right")
        
    # format with month interval
    ax.get_xaxis().set_major_locator(mdates.MonthLocator(interval=1))
    ax.get_xaxis().set_major_formatter(mdates.DateFormatter("%d %b %Y"))
    plt.setp(ax.get_xticklabels(), rotation=30, ha="right")
    # remove y axis and spines
    ax.get_yaxis().set_visible(False)
    for spine in ["left", "top", "right"]:
        ax.spines[spine].set_visible(False)
    ax.margins(y=0.1)
    plt.xlabel('Time')
    if export: 
    	plt.savefig('./plots/' + file_name+'.png')
    	print('Exported ' + file_name + '.png' + ' in the plot directory')
    if show: plt.show()


if __name__ == "__main__":
    dict_of_pages = {
        'index': '/~prshah',
        'login': '/~prshah/login.html',
        'maintenance': '/~prshah/maintenance.php',
    }
    for key, _ in dict_of_pages.items(): #loop through dict
        page_graph(key, False, True)
    
    error_graph('error', False, True)
Footer