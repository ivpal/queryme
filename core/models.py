from django.db import models
from django.contrib.auth.models import User


class Profile(models.Model):
    avatar = models.CharField(max_length=22, null=True)
    banner = models.CharField(max_length=22, null=True)
    user = models.OneToOneField(User, primary_key=True, on_delete=models.CASCADE)
    facebook_id = models.BigIntegerField(null=True)
    updated_at = models.DateTimeField(auto_now_add=True)


class Question(models.Model):
    content = models.CharField(max_length=300)
    is_anonymous = models.BooleanField(default=False)
    profile = models.ForeignKey(Profile, on_delete=models.CASCADE)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now_add=True)


class Reply(models.Model):
    content = models.TextField
    question = models.ForeignKey(Question, on_delete=models.CASCADE)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now_add=True)


class Like(models.Model):
    profile = models.ForeignKey(Profile, on_delete=models.CASCADE)
    question = models.ForeignKey(Question, on_delete=models.CASCADE)
    created_at = models.DateTimeField(auto_now_add=True)


class Follow(models.Model):
    follower = models.ForeignKey(Profile, related_name='following', on_delete=models.CASCADE)
    following = models.ForeignKey(Profile, related_name='followers', on_delete=models.CASCADE)
    created_at = models.DateTimeField(auto_now_add=True)

