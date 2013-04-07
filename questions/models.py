from django.db import models

class Question(models.Model):
    question = models.CharField(max_length = 200)

    def __unicode__(self):
        return self.question

class Answer(models.Model):
    question = models.ForeignKey(Question)
    answer_text = models.CharField(max_length=200)
    answer_date = models.DateTimeField('date answered')
    
    def __unicode__(self):
        return self.answer_text
