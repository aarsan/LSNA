import datetime
from django.shortcuts import render
from django.contrib.auth.models import User

def index(request):
    time = datetime.datetime.now()
    users = User.objects.all()
    context = {'time': time, 'users': users}
    return render(request, 'index.html', context)

def home(request):
    users = User.objects.all()
    context = {'users': users}
    return render(request, 'home.html', context)

def login(request):
    return render()
    
