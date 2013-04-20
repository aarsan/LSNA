import datetime
from django.shortcuts import render
from django.contrib.auth.models import User
from django.core.context_processors import csrf

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

def users(request):
    user = User.objects.get(pk=1)
    context = {'user': user}
    return render(request, 'users.html', context)
    
