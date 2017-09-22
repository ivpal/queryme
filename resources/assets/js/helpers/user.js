const USER_KEY = 'qmUser';

const getUserObj = () => JSON.parse(localStorage.getItem(USER_KEY));

export const getAvatarUrl = () => getUserObj().avatar;

export const getNickname = () => getUserObj().nickname;

export const getUsername = () => getUserObj().username;

export const store = (userObj) => { localStorage.setItem(USER_KEY, JSON.stringify(userObj)) };

export const destroy = () => { localStorage.removeItem(USER_KEY) };
