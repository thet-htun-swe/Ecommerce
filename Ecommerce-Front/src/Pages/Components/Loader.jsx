import React from 'react'

export default function Loader() {
  return (
    <div className="d-flex justify-content-center align-items-center p-3">
      <div className="spinner-border" role="status">
        <span className="sr-only"></span>
      </div>
    </div>
  )
}
