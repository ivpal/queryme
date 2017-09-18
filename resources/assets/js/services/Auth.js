import DateHelper from '../helpers/DateHelper';

const AUTH_KEY = 'qmAuthentication';

export default class Auth {
    static getWebAppToken() {
        if (!Queryme.token.accessToken || new Date(Queryme.token.expiresAt) > DateHelper.nowInUTC()) {
            axios.get('api/webapp-token')
                .then(response => {
                    const data = response.data;
                    const { access_token: accessToken, expires_at: expiresAt } = data;
                    const obj = {
                        accessToken,
                        expiresAt,
                        isLoggedIn: false,
                    };
                    localStorage.setItem(AUTH_KEY, JSON.stringify(obj));
                });
        }
    }

    static isAuth() {
        const qmAuth = JSON.parse(localStorage.getItem(AUTH_KEY));
        return qmAuth && qmAuth.isLoggedIn && new Date(qmAuth.expiresAt) > DateHelper.nowInUTC()
    }

    static login({ access_token: accessToken, expires_at: expiresAt }) {
        // TODO: check expires_at date

        const qmAuth = {
            accessToken,
            expiresAt,
            isLoggedIn:  true,
        };

        localStorage.setItem(AUTH_KEY, JSON.stringify(qmAuth));
    }

    static logout() {
        localStorage.removeItem(AUTH_KEY);
    }
}