import React, { useEffect } from 'react';
import Menu from '../nav/NavBar';

export default function Layout({ children } : any) {
  return (
    <main className='font-[Poppins]'>
      <header>
        <Menu />
      </header>
      <div>1</div>
      <article className='mt-24'>{children}</article>
    </main>
  )
}