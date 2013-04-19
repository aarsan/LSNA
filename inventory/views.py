import datetime
from django.shortcuts import render
from django.contrib.auth.models import User

def index(request):
    time = datetime.datetime.now()
    user = User.objects.all()
    context = {'time': time, 'user': user}
    return render(request, 'index.html', context)
