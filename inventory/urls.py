from django.conf.urls import patterns, url

from inventory import views

urlpatterns = patterns('',
    url(r'^$', views.index, name='index'),
    url(r'^home', views.home, name='home'),
    url(r'^users', views.users, name='users'),
    url(r'^properties/new', views.new_property, name='new_property'),
    url(r'^properties', views.properties, name='properties'),
    url(r'^logout', views.logout_view, name='logout_view')
)
