from django.contrib import admin
from questions.models import Question
from questions.models import Answer

admin.site.register(Question)
admin.site.register(Answer)

