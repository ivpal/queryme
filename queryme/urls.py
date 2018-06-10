from django.contrib import admin
from django.urls import path
from django.contrib.auth import views as auth_views
from django.conf.urls import include

from core import views as core_views

urlpatterns = [
    path('', core_views.home, name='home'),
    path('signup/', core_views.signup, name='signup'),
    path('login/', auth_views.login, name='login'),
    path('logout/', auth_views.logout, name='logout'),
    path('oauth/', include('social_django.urls', namespace='social')),
    path('admin/', admin.site.urls),
]
