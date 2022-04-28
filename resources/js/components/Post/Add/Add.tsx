import { Inertia } from '@inertiajs/inertia';
import React, { useState } from 'react';
import { useForm } from '@inertiajs/inertia-react';


interface props {
    'title' : string,
    'body' : string,
    'image_url' : any
    // 'user_id'? : number
}

const Add:React.FC = () => {

    const [values, setvalues] = useState<props>({
        'title' : '',
        'body' : '',
        'image_url' : null
    })

    const handleChange = (event : React.ChangeEvent< HTMLInputElement>) => {
        event.preventDefault();
        setvalues({...values,
            [event.target.name]: event.target.value
        });
    }

    const handleSubmit = (e : React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        let data = new FormData();
        data.append('title', values.title);
        data.append('body', values.body);
        data.append('image_url', values.image_url);
        // console.log(data);
        Inertia.post('/post/store', data, {
            forceFormData: true,
          });
    }

    const setCover = (e : React.ChangeEvent<HTMLInputElement>) => {
        values.image_url = e.target.files![0];
    }

  return (
    <div>
        <form onSubmit={handleSubmit} className='flex flex-col mx-auto w-[50%]'>
            <div className="mb-6">
                <label htmlFor="title" className="block mb-2 text-sm font-medium text-black ">Title*</label>
                <input value={values.title} placeholder='title ...' onChange={handleChange} name="title" required type="text" id="title" className="block py-4 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 "/>
            </div>
            <div className='mb-6'>
                <label htmlFor="description" className="block mb-2 text-sm font-medium text-gray-900 ">Description*</label>
                <input value={values.body} onChange={handleChange} name="body" required type="text" id="description" className="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 " placeholder='Description ....'/>
            </div>
            <div>
                <label htmlFor="image_src" className="block mb-2 text-sm font-medium text-gray-900 ">Upload Image*</label>
                <input onChange={setCover} type="file" />
            </div>
            <button className='mt-11 px-4 py-3 bg-indigo-500 font-medium text-white w-[130px] self-center rounded-md shadow-md' type='submit'>Add Post</button>
        </form>
    </div>
  )
}

export default Add