import { Inertia } from '@inertiajs/inertia';
import React, { ReactEventHandler, useState } from 'react'

interface props {

}

const Add:React.FC<props> = () => {

    const [values, setvalues] = useState<object>({
        'title' : '',
        'body' : '',
        'user_id' : 1,
    })

    const handleChange = (event : React.ChangeEvent< HTMLInputElement>) => {
        event.preventDefault();
        setvalues({...values,
            [event.target.name]: event.target.value
        });
    }

    const handleSubmit = (e : React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        console.log(values);
        // Inertia.post('/post/store', values);
    }

  return (
    <div>
        <form onSubmit={handleSubmit} className='flex flex-col mx-auto w-[50%]'>
            <div className="mb-6">
                <label htmlFor="title" className="block mb-2 text-sm font-medium text-black ">Title*</label>
                <input placeholder='title ...' onChange={handleChange} name={values.title} required type="text" id="title" className="block py-4 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 "/>
            </div>
            <div>
                <label htmlFor="description" className="block mb-2 text-sm font-medium text-gray-900 ">Description*</label>
                <input onChange={handleChange} name={values.body} required type="text" id="description" className="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 " placeholder='Description ....'/>
            </div>
            <button className='mt-11 px-4 py-3 bg-indigo-500 font-medium text-white w-[130px] self-center rounded-md shadow-md' type='submit'>Add Post</button>
        </form>
    </div>
  )
}

export default Add