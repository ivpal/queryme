from django.test import TestCase
from django.urls import reverse


class HomeTests(TestCase):
    def test_home_view_contains_links_for_signup_or_login(self):
        response = self.client.get(reverse('home'))
        self.assertContains(response, 'QueryMe')
        self.assertContains(response, 'href="{0}"'.format(reverse('signup')))
        self.assertContains(response, 'href="{0}"'.format(reverse('login')))
