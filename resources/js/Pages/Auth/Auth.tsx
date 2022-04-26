import React, { useState } from 'react'
import NavBar from '../../Components/NavBar'
import Signup from './Register/Signup'
import Signin from './Signin/Signin'

const Auth = () => {

  const [register, setRegister] = useState<boolean>(false);

  return (
    <div className='w-screen h-screen bg-gray-100 relative'>
      <NavBar />
      <div className={`m-auto relative ${!register ? 'flex' : 'hidden'}`}>
        <Signin register={register} setRegister={setRegister} />
      </div>
      <div className={`m-auto absolute top-[2px] ${!register ? '-translate-x-[1100px]' : 'translate-x-0'} z-0 duration-300 ease-in-out`}>
        <Signup register={register} setRegister={setRegister} />
      </div>
    </div>
  )
}

export default Auth