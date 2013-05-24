import datetime
from django.shortcuts import render, redirect
from django.contrib.auth.models import User
from django.contrib.auth import authenticate, login, logout
from django.http import HttpResponse
from inventory.models import Property, Queue, Question, Answer

def index(request):
    time = datetime.datetime.now()
    users = User.objects.all()
    context = {'time': time, 'users': users}
    return render(request, 'index.html', context)

def home(request):
    if request.method == 'GET':
        user = request.user.id
        queues = Queue.objects.all()
        context = {'queues': queues }
        return render(request, 'home.html', context)
    else:
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
    user = User.objects.all()
    context = {'user': user}
    return render(request, 'users.html', context)

def user_detail(request, user_id):
    try:
        user = User.objects.get(pk=user_id)
        context = {'user': user}
    except (KeyError, User.DoesNotExist):
        return HttpResponse("User Not Found")
    else:
        return render(request, 'user_detail.html', context)

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
            user = request.user.id
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
        user_id = request.user.id
        user = User.objects.get(pk=user_id)
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

def queue(request, user_id):
    user = User.objects.get(pk=user_id)
    queue = Queue.objects.filter(user_id=user_id)
    context = {'queue': queue }

    if queue.exists:
        return render(request, 'queue.html', context)
    else:
        return HttpResponse("You have no properties in your queue. <a href='/home'>back</a>")

def logout_view(request):
    logout(request)
    return redirect('/')

def survey(request, queue_id, user_id):
    queue = Queue.objects.get(pk=queue_id)
    user = User.objects.get(pk=user_id)
    uaq = Question.objects.exclude(id__in = queue.answers.values('question_id'))
    aq = queue.answers.all()
    context = {'aq': aq, 'uaq': uaq, 'user': user, 'queue': queue, 'user_id': user_id}
    return render(request, 'survey.html', context)

def question(request, queue_id, user_id, q_id):
    q_text = Question.objects.get(id=q_id)
    context = {'q_id': q_id, 'q_text': q_text, 'queue_id': queue_id}
    return render(request, 'question.html', context)

def mod_question(request, queue_id, user_id, q_id):
    if request.method == "POST":
        answer = request.POST['answer']
        queue = Queue.objects.get(pk=queue_id)
        a = queue.answers.get(question_id=q_id)
        a_id = a.id
        a = Answer.objects.filter(pk=a_id)
        a.update(answer=answer)
        return redirect('/users/' + user_id + '/queue/' + queue_id + '/survey')
    else:
        q_text = Question.objects.get(id=q_id)
        queue = Queue.objects.get(pk=queue_id)
        a = queue.answers.get(question_id=q_id)
        answer = a.answer
        context = {'q_text': q_text, 'queue_id': queue_id, 'answer': answer, 'q_id': q_id}
        return render(request, 'question_update.html', context)

def answer(request):
    if request.method == "POST":
        queue_id = request.POST['queue_id']
        q_id = request.POST['q_id']
        a = request.POST['answer']
        user_id = request.POST['user_id']
        queue = Queue.objects.get(pk=queue_id)
        question = Question.objects.get(pk=q_id)
        answer = Answer(answer=a, question=question)
        answer.save()
        queue.answers.add(answer)
        return redirect('/users/' + user_id + '/queue/' + queue_id + '/survey')
    else:
        return HttpResponse("method not allowed")
