import React, { useState } from 'react'
import Layout from '../../../components/common/Layout'
import { Inertia } from '@inertiajs/inertia';

interface props {
    postDetails : any,
    comments : Array<any>,
}

const Preview:React.FC<props> = ({postDetails, comments}) => {

    const [comment, setcomment] = useState<any>({
        'body' : '',
        'post_id' : postDetails.id
    })

    const handleComment = (e : React.ChangeEvent<HTMLTextAreaElement>) => {
        e.preventDefault();
        setcomment({...comment,
            [e.target.name]: e.target.value
        });
    }

    const handleSubmit = (e : React.FormEvent<HTMLFormElement>) => {
        // e.preventDefault();
        Inertia.post('/addComment', comment);
    }

  return (
    <Layout>
        <div className="w-[90%] max-w-2xl bg-white font-[Poppins] py-7 px-9 mb-6 shadow-md rounded-xl">
            <div className="flex flex-row items-center justify-between h-[6rem]">
                <div className="flex flex-col">
                <h1 className="font-bold sm:text-2xl text-base w-[80%]">{postDetails.title}</h1>
                <p className="text-gray-400 text-[13px]">{postDetails.created_at}</p>
                </div>
                    <div className="flex flex-col justify-evenly items-center">
                        <p className="text-2xl font-bold font-[Poppins]">30</p>
                    </div>
            </div>
            <div>
                {postDetails.image_url != null && <img src={`http://127.0.0.1:8000/uploads/images/${postDetails.image_url}`} alt="" className='h-[300px]'/>}
            </div>
            <p className=" text-gray-400 mt-4"> {postDetails.body} </p>
        </div>
        <div>
            {
                comments.length && comments.map((element : any, index) => {
                    return <div key={index}>
                        <div className='px-4 py-4 mt-3 shadow rounded-sm md:w-[50%] w-full'>
                            <div className='flex flex-row justify-between items-center'>
                                <p>{element.body}</p>
                                <button className='text-red-600'>Delete</button>
                            </div>
                        </div>
                    </div>
                })
            }
        </div>
        <div className="max-w-lg shadow-md mt-5">
            <form onSubmit={handleSubmit} className="w-full p-2">
                <div className="mb-2">
                    <label htmlFor="comment" className="text-lg text-gray-600">Add a comment</label>
                    <textarea value={comment.body} onChange={handleComment} className="w-full h-20 p-2 border rounded focus:outline-none focus:ring-gray-300 focus:ring-1"
                    name="comment" placeholder=""></textarea>
                </div>
                <button className="px-3 py-2 text-sm text-blue-100 bg-blue-600 rounded">Comment</button>
            </form>
        </div>
    </Layout>
  )
}

export default Preview