from django.conf.urls import patterns, url

from inventory import views

urlpatterns = patterns('',
    url(r'^$', views.index, name='index'),
    url(r'^home', views.home, name='home'),
    url(r'^home', views.home, name='home'),
    url(r'^answer', views.answer, name='answer'),
    url(r'^users/(?P<user_id>\d+)/queue/(?P<queue_id>\d+)/survey/(?P<q_id>\d+)/modify', views.mod_question, name='mod_question'),
    url(r'^users/(?P<user_id>\d+)/queue/(?P<queue_id>\d+)/survey/(?P<q_id>\d+)', views.question, name='question'),
    url(r'^users/(?P<user_id>\d+)/queue/(?P<queue_id>\d+)/survey', views.survey, name='survey'),
    url(r'^users/(?P<user_id>\d+)/queue/(?P<queue_id>\d+)/submit', views.submit, name='submit'),
    url(r'^users/(?P<user_id>\d+)/queue', views.queue, name='queue'),
    url(r'^users/(?P<user_id>\d+)', views.user_detail, name='user_detail'),
    url(r'^users', views.users, name='users'),
    url(r'^properties/(?P<prop_id>\d+)/detail', views.property_detail, name='property_detail'),
    url(r'^properties/addtoqueue', views.add_property_to_queue, name='add_property_to_queue'),
    url(r'^properties/images', views.property_images, name='property_images'),
    url(r'^properties/new', views.new_property, name='new_property'),
    url(r'^properties/add', views.add_property, name='add_property'),
    url(r'^properties', views.properties, name='properties'),
    url(r'^logout', views.logout_view, name='logout_view'),
    url(r'^streets', views.streets, name='streets'),
    url(r'^report/(?P<prop_id>\d+)', views.report, name='report')
)
