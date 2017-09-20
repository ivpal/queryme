import * as DateHelper from '../helpers/DateHelper';

const USER_KEY = 'qmUser';
const AUTH_KEY = 'qmAuthentication';

const getWebAppToken = () => {
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
      setupAxios();
    });
};

const login = ({ access_token: accessToken, expires_at: expiresAt }) => {
  // TODO: check expires_at date

  const qmAuth = {
    accessToken,
    expiresAt,
    isLoggedIn:  true,
  };

  localStorage.setItem(AUTH_KEY, JSON.stringify(qmAuth));
  setupAxios();
};

const setupAxios = () => {
  const token = accessToken();
  if (token) {
    axios.defaults.headers.common['Accept'] = 'application/json';
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
  }
};

const accessToken = () => {
  const tokenObj = JSON.parse(localStorage.getItem(AUTH_KEY));
  if (tokenObj) {
    return tokenObj.accessToken;
  }

  return null;
};

const isExpire = () => {
  const expiresAt = JSON.parse(localStorage.getItem(AUTH_KEY)).expiresAt;
  return !expiresAt || new Date(expiresAt) < DateHelper.nowInUTC();
};

export const setup = () => {
  if (Queryme.token) {
    login(Queryme.token);

    if (Queryme.user) {
      localStorage.setItem(USER_KEY, JSON.stringify(Queryme.user));
    }
  } else if (!accessToken() || isExpire()) {
    getWebAppToken();
  }
};

export const logout = () => {
  localStorage.removeItem(AUTH_KEY);
  localStorage.removeItem(USER_KEY);
};

export const isAuth = () => {
  const qmAuth = JSON.parse(localStorage.getItem(AUTH_KEY));
  return qmAuth && qmAuth.isLoggedIn && new Date(qmAuth.expiresAt) > DateHelper.nowInUTC()
};
