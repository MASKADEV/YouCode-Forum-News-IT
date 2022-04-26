import React, { useState } from 'react'

interface props {
    setRegister : React.Dispatch<React.SetStateAction<boolean>>;
    register : boolean;
}

const Signin = ({setRegister, register} : props) => {

    const [email, setEmail] = useState<string>("");
    const [password, setPassword] = useState<string>("");

  return (
    <div className={`w-screen mt-[5rem] `}>
        <div className='container mx-auto flex items-center justify-center'>
            <form className={`bg-white shadow-md rounded-md px-11 pt-6 pb-8 mb-4 m-auto`}>
                <div className="mb-4">
                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="email">
                    Email
                </label>
                <input className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email" />
                </div>
                <div className="mb-6">
                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="password"> Password </label>
                <input className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************"/>
                {/* <p className="text-red-500 text-xs italic">Please choose a password.</p> */}
                </div>
                <div className="flex items-center justify-between">
                <button className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Sign In
                </button>
                <a className="inline-block align-baseline font-bold ml-2 text-sm text-blue-500 hover:text-blue-800" href="#">
                    Forgot Password?
                </a>
                </div>
                <p className='text-[13px] mt-4'>if you don't have an account? <span onClick={() => {setRegister(!register)}} className='text-indigo-600 ml-1 hover:cursor-pointer font-medium text-[15px]'>Register</span></p>
            </form>
        </div>
    </div>
  )
}

export default Signin