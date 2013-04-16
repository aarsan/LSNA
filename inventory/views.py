from django.http import HttpResponse
import datetime

def index(request):
    now = datetime.datetime.now()
    html = "Welcome to the LSNA inventory application! It is now %s" %now
    return HttpResponse(html)

