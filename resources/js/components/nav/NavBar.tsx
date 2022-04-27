import React from 'react'
import { Link } from '@inertiajs/inertia-react';

const Menu = () => {
  return (
    <div className='h-[4rem] shadow-md fixed w-screen bg-white'>
        <header>
          <nav className='sm:px-5 px-2 h-[4rem] items-center flex flex-row justify-between'>
            <div className='flex items-center flex-row'>
              <h1 className='sm:text-2xl text-md font-bold w-[3rem] mx-4'>Brand.</h1>
              <Link className='px-3 ml-9 font-medium' href="/home">Home</Link>
              <Link className='px-3 ml-3 font-medium' href="/profile">Profile</Link>
            </div>
            <div>
              <Link method='POST' href="/logout">Logout</Link>
            </div>
          </nav>
        </header>
    </div>
  )
}

export default Menu