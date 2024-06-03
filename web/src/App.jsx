import Carousel from './assets/components/Carousel';
import Header from './assets/views/Header'
import { useEffect } from 'react';
import HomePage from './assets/views/HomePage';
import ListPage from './assets/views/ListPage'
import WikiPage from './assets/views/WikiPage'

function App() {
  return (
    <>
      <Header />
      <WikiPage />
    </>
  )
}

export default App
