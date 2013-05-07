import datetime
from django.shortcuts import render, redirect
from django.contrib.auth.models import User
from django.contrib.auth import authenticate, login, logout
from django.http import HttpResponse
from inventory.models import Property, Queue

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
            queues= Queue.objects.all()
            context = {'queues': queues }
            return render(request, 'home.html', context)
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
        p = Property.objects.all()
        context = {'p': p}
        return render(request, 'properties.html', context)
    else:
        return HttpResponse("you must be logged in to see this page. <a href='/'>home</a>")

def new_property(request):
    if request.method == 'GET':
        context = {}
        return render(request, 'add_new_property.html', context)
    elif request.method == 'POST':
        number = request.POST['number']
        street = request.POST['street']
        numcount = len(number)
        streetcount = len(street) 

        if numcount < 1 or streetcount < 1:
            return HttpResponse("Please fill out all fields and try again. <a href='new'>back</a> ")
        else:
            user = User.objects.get(pk=1)
            date = datetime.datetime.now()
            context = {'user': user, 'date': date, 'number': number, 'street': street}
        return render(request, 'add_new_property_confirm.html', context)

    else:
        return HttpResponse("Method not allowed.")

def add_property(request):
    if request.method == 'POST':
        number = request.POST['number']
        street = request.POST['street']
        added_by = request.POST['user']
        user = User.objects.get(pk=1)
        date = '2013-05-05 20:30'
        date_added = request.POST['date']
        p = Property(number=number, street=street, zip='11215', date_added=date, added_by=user)
        p.save()
        q = Queue(date_added=date, user=user, property=p)
        q.save()
        context = {}
        return HttpResponse("Property Added <a href='/'>home</a>")
    else:
        return redirect('/')

def logout_view(request):
    logout(request)
    return redirect('/')
