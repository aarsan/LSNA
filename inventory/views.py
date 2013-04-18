from django.http import HttpResponse
import datetime
from django.template import loader

def index(request):
    now = datetime.datetime.now()
    template = loader.get_template('inventory/index.html')
    return HttpResponse(template.render)

