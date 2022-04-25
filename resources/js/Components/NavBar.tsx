import React from 'react'
import { Link } from '@inertiajs/inertia-react'

const NavBar = () => {
  return (
    <div className=' w-screen sm:px-[10rem] px-[1rem] flex flex-row justify-between items-center h-[4rem] shadow-md'>
      <h1 className='sm:text-2xl text-lg font-[Poppins] font-bold'>Brand.</h1>
      <header className='flex flex-row font-[Poppins]'>
        <Link href="/home" className='w-[60px] hover:cursor-pointer hover:font-bold font-medium'>Home</Link>
        <Link href="/profile" className='w-[60px] hover:cursor-pointer hover:font-bold font-medium' >Profile</Link>
        <Link href="/signin" className='w-[60px] hover:cursor-pointer hover:font-bold font-medium'>Sign in</Link>
      </header>
    </div>

  )
}

export default NavBar