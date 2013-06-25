from django.db import models

class Property(models.Model):
    street = models.CharField(max_length=50)
    number = models.CharField(max_length=10)
    zip    = models.IntegerField(max_length=6)
    date_added  = models.DateTimeField('date added')
