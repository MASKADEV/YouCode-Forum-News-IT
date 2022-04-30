import React from 'react';
import Layout from '../../../components/common/Layout';
import {Head, Link} from '@inertiajs/inertia-react';

interface props {
    'latestPosts' : Array<any>,
}

const Latest: React.FC<props> = ({latestPosts}) => {
  return (
    <Layout>
        <Head title='Latest' />
        <div>
            <div className='flex flex-row'>
                <Link href='/home/trending'><h1 className='mx-2 px-4 py-2 font-bold text-[2rem]'>Trending</h1></Link>
                <Link href='/home'><h1 className='mx-2 px-4 py-2 font-bold text-[2rem] underline'>Latest</h1></Link>
            </div>
            <div >
                {
                latestPosts.length && latestPosts.map((element : any, index : number)=> {
                    return  <div key={index} className="w-[90%] max-w-2xl bg-white font-[Poppins] py-7 px-9 mb-6 shadow-md rounded-xl">
                                <div className="flex flex-row items-center justify-between h-[6rem]">
                                    <div className="flex flex-col">
                                        <h1 className="font-bold sm:text-2xl text-base w-[80%]">{element.title}</h1>
                                        <p className="text-gray-400 text-[13px]">{element.created_at}</p>
                                    </div>
                                    <div className="flex flex-col justify-evenly items-center">
                                        <p className="text-2xl font-bold font-[Poppins]">30</p>
                                    </div>
                                </div>
                                <div>
                                    {element.image_url != null && <img src={`http://127.0.0.1:8000/uploads/images/${element.image_url}`} alt="" className='h-[300px]'/>}
                                </div>
                                <p className=" text-gray-400 mt-4"> {element.body} </p>
                                <div className=" mt-5 flex flex-row justify-between">
                                    <div className="flex flex-row justify-between w-full">
                                        <div className="hover:cursor-pointer">
                                            <Link href={`/postpreview/${element.id}`} className="ml-2">Comments</Link>
                                        </div>
                                        <div className="sm:flex flex-row items-center text-gray-400 text-base hover:cursor-pointer">
                                            <p className="">Autor</p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    })
                }
            </div>
        </div>
    </Layout>
  )
}

export default Latest