import DateHelper from '../helpers/DateHelper';

const AUTH_KEY = 'qmAuthentication';

export default class Auth {
  static getWebAppToken() {
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
        this.setupAxios();
      });
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
    this.setupAxios();
  }

  static logout() {
    localStorage.removeItem(AUTH_KEY);
  }

  static setupAxios() {
    const token = this.accessToken();
    if (token) {
      axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    }
  }

  static setup() {
    if (Queryme.token.access_token) {
      this.login(Queryme.token);
    } else if (!this.accessToken() || this.isExpire()) {
      this.getWebAppToken();
    }
  }

  static accessToken() {
    const tokenObj = JSON.parse(localStorage.getItem(AUTH_KEY));
    if (tokenObj) {
      return tokenObj.accessToken;
    }

    return null;
  }

  static isExpire() {
    const expiresAt = JSON.parse(localStorage.getItem(AUTH_KEY)).expiresAt;
    return !expiresAt || new Date(expiresAt) < DateHelper.nowInUTC();
  }
}