import datetime
from django.shortcuts import render, redirect
from django.contrib.auth.models import User
from django.contrib.auth import authenticate, login, logout
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
            return render(request, 'home.html')
        else:
            return HttpResponse("Your account is inactive.")
    else:
        return HttpResponse("Invalid user name or password.")

def users(request):
    user = User.objects.get(pk=1)
    context = {'user': user}
    return render(request, 'users.html', context)

def properties(request):
    if request.user.is_authenticated():
        context = {}
        return render(request, 'properties.html', context)
    else:
        return HttpResponse("you must be logged in to see this page. <a href='/'>home</a>")

def new_property(request):
    if request.method == 'GET':
        context = {}
        return render(request, 'add_new_property.html', context)
    elif request.method == 'POST':
        user = User.objects.get(pk=1)
        content = "Welcome, " + user.first_name
        return HttpResponse(content)
    else:
        return HttpResponse("Method not allowed.")

def logout_view(request):
    logout(request)
    return redirect('/')
