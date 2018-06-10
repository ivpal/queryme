from django.test import TestCase
from django.urls import reverse


class LoginTests(TestCase):
    def test_login_view_contains_links_for_social_auth(self):
        response = self.client.get(reverse('login'))
        self.assertContains(
            response,
            'href="{0}"'.format(reverse('social:begin', kwargs={'backend': 'facebook'}))
        )
