export const parseCookie = () => {
  const cookieObj = {}
  const cookieArr = document.cookie.split(';')

  for (const key in cookieArr) {
    const cookie = cookieArr[key].trim().split('=')
    cookieObj[cookie[0]] = cookie[1]
  }

  return cookieObj
}

export const getCookie = (name) => {
  let value = parseCookie()[name]
  if (value) value = decodeURIComponent(value)

  return value
}

export const setCookie = (name, value, exdays) => {
  const date = new Date()
  date.setTime(date.getTime() + (exdays * 24 * 60 * 60 * 1000))
  const expires = 'expires=' + date.toUTCString()
  document.cookie = name + '=' + value + ';' + expires + ';path=/'
}
