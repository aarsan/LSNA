from django.http import HttpResponse

def index(request):
    return HttpResponse("This page will show the list of questions.")
