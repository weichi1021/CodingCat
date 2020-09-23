import { getCookie } from '@utils/cookie'

export const isLogin = () => {
  const token = getCookie('user-token')
  console.log(token)
  return !!token
}
