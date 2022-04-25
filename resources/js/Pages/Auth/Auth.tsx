import React, { useState } from 'react'
import NavBar from '../../Components/NavBar'
import Signup from './Register/Signup'
import Signin from './Signin/Signin'

const Auth = () => {

  const [register, setRegister] = useState<boolean>(false);

  return (
    <div className='w-screen h-screen bg-gray-100 relative'>
      <NavBar />
      <div className='m-auto relative'>
        <Signin />
      </div>
      <div className={`m-auto absolute top-[40px]`}>
        <Signup />
      </div>
    </div>
  )
}

export default Auth