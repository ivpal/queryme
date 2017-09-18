import DateHelper from '../helpers/DateHelper';

const AUTH_KEY = 'qmAuthentication';

export default class Auth {
    static isAuth() {
        const qmAuth = localStorage.getItem(AUTH_KEY);
        return qmAuth && qmAuth.isLoggedIn && new Date(qmAuth.expiresAt) > DateHelper.nowInUTC()
    }

    static login({ access_token, expires_at }) {
        // TODO: check expires_at date

        const qmAuth = {
            expiresAt:   expires_at,
            isLoggedIn:  true,
            accessToken: access_token,
        };

        localStorage.setItem(AUTH_KEY, qmAuth);
    }

    static logout() {
        localStorage.removeItem(AUTH_KEY);
    }
}