import { Inertia } from '@inertiajs/inertia';
import axios from 'axios';
import React, { useEffect, useState } from 'react'

interface props {
    setRegister : React.Dispatch<React.SetStateAction<boolean>>;
    register : boolean;
}

const Signup = ({setRegister, register} : props) => {

    const [name, setname] = useState<string>("")
    const [email, setEmail] = useState<string>("")
    const [password, setpassword] = useState<string>("")
    const [password_confirmation, setPasswordConfirmation] = useState<string>("")

    const registerHandle = async (e : any) => {
        e.preventDefault();
        Inertia.post('/register', {name, email, password, password_confirmation});
    }
    

  return (
        <div className='w-screen mt-[5rem]'>
                <div className='container mx-auto flex items-center justify-center'>
                    <form onSubmit={registerHandle} className="bg-white shadow-md rounded-md px-[5rem] pt-6 pb-8 mb-4 m-auto">
                        <div className="mb-4">
                            <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="name">
                                Full Name*
                            </label>
                            <input onChange={(e:any) => {setname(e.target.value)}} value={name} className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Full Name" />
                        </div>
                        <div className="mb-4">
                            <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="email">
                                Email*
                            </label>
                            <input onChange={(e) => {setEmail(e.target.value)}} value={email} className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email" />
                        </div>
                        <div className="mb-6">
                            <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="password">Password*</label>
                            <input onChange={(e) => {setpassword(e.target.value)}} value={password} className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************"/>
                        </div>
                        <div className="mb-6">
                            <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="confirm_password">Confirme Password*</label>
                            <input value={password_confirmation} onChange={(e) => {setPasswordConfirmation(e.target.value)}} className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="confirm_password" type="password" placeholder="******************"/>
                        </div>
                        <div className="flex items-center justify-center">
                            <button  className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Sign Up
                            </button>
                        </div>
                        <p className='text-[13px] mt-4'>you have an account? <span onClick={() => {setRegister(!register)}} className='text-indigo-600 ml-1 hover:cursor-pointer font-medium text-[15px]'>Sign in</span></p>
                    </form>
                </div>
        </div>
  );
}

export default Signup