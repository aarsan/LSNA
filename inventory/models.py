from django.db import models
from django.contrib.auth.models import User

class Property(models.Model):
    street = models.CharField(max_length=50)
    number = models.CharField(max_length=10)
    zip    = models.IntegerField(max_length=6)
    date_added  = models.DateTimeField('date added')
    added_by = models.ForeignKey(User)

    def __unicode__(self):
        return self.number + " " + self.street

class Question(models.Model):
    question = models.CharField(max_length=100)
    
class Answer(models.Model):
    answer = models.CharField(max_length=10)
    question = models.ForeignKey(User)

class Pass(models.Model):
    date = models.DateTimeField('date surveyed')
    property = models.ForeignKey(Property)
    answers = models.ManyToManyField(Answer)

class Queue(models.Model):
    date_added = models.DateTimeField('date added')
    user = models.ForeignKey(User)
    property = models.ForeignKey(Property)
    answers = models.ManyToManyField(Answer)
    
    def __unicode__(self):
        return unicode(self.property)

