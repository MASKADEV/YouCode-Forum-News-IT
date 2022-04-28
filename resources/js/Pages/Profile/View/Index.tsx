import { Head } from '@inertiajs/inertia-react';
import React from 'react';
import Layout from '../../../components/common/Layout';

interface props {
    profile_details : any,
}

const Index: React.FC<props> = ({profile_details}) => {
  return (
    <Layout>
        <Head title='Profile' />
        <div className='flex flex-col items-center'>
            <div className='h-[11rem] mb-6 bg-gray-100 w-[11rem] shadow-lg rounded-full items-center flex justify-center'>
                Profile Image
            </div>
            <form action="" className='w-full'>
                <div className="mb-6 w-[30%] mt-3 mx-auto flex flex-row items-center">
                    <input  disabled value={profile_details.name}  name="title" required type="text" id="title" className="block py-4 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 "/>
                    <h1 className='ml-2 hover:cursor-pointer text-indigo-600'>Edit</h1>
                </div>
                <div className="mb-6 w-[30%] mx-auto flex flex-row items-center">
                    <input  disabled value={profile_details.email}  name="title" required type="text" id="title" className="block py-4 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 "/>
                    <h1 className='ml-2 hover:cursor-pointer text-indigo-600'>Edit</h1>
                </div>
            </form>

            <div className='mt-9 font-bold'>
                <h1 className='md:text-2xl text-indigo-600 text-md'>My Articles</h1>
            </div>
        </div>
    </Layout>
  )
}

export default Index