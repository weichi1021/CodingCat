export const parseQueryString = () => {
  const paramObj = {}
  const paramStr = location.search.slice(1)

  if (!paramStr) return paramObj

  const paramArr = paramStr.split('&')
  for (const key in paramArr) {
    const keyArr = paramArr[key].trim().split('=')
    paramObj[keyArr[0]] = keyArr[1]
  }

  return paramObj
}

export const getQueryString = (name) => {
  let value = parseQueryString()[name]
  if (value) value = decodeURIComponent(value)

  return value
}
