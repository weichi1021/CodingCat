export function isError (array, value) {
  return (array.indexOf(value) !== -1)
}

export function isRequired (value) {
  return (!!value && !value.trim())
}
