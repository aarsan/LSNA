import datetime
from django.shortcuts import render
from django.contrib.auth.models import User
from django.contrib.auth import authenticate, login
from django.http import HttpResponse

def index(request):
    time = datetime.datetime.now()
    users = User.objects.all()
    context = {'time': time, 'users': users}
    return render(request, 'index.html', context)

def home(request):
    username = request.POST['username']
    password = request.POST['password']
    user = authenticate(username=username, password=password)
    if user is not None:
        if user.is_active:
            login(request, user)
            context = {'users': users}
            return render(request, 'home.html', context)
        else:
            return HttpResponse("Your account is inactive.")
    else:
        return HttpResponse("Invalid user name or password.")

def users(request):
    user = User.objects.get(pk=1)
    context = {'user': user}
    return render(request, 'users.html', context)
    
