import * as c from '../helpers/constants'

const USER_PATH = 'users';

export default {
  getInfo(nickname) {
    return axios.get(`${c.API_URL}${USER_PATH}/${nickname}`)
  }
}