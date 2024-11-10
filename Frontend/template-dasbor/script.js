const App = () => {
    const [sidebarOpen, setSidebarOpen] = React.useState(false);
    const [progress, setProgress] = React.useState(25); // Initial progress percentage

    // Function to toggle the sidebar open/close
    const toggleSidebar = () => {
        setSidebarOpen(prevState => !prevState);
    };

    // Function to update the progress
    const updateProgress = () => {
        setProgress(prev => Math.min(prev + 10, 100)); // Increase progress by 10%, capped at 100%
    };

    return (
        <div className="flex">
            {/* Sidebar */}
            <aside className={`sidebar flex flex-col items-center py-4 transition-all duration-300 ${sidebarOpen ? 'w-64' : 'w-16'}`}>
                <div className="mb-8">
                    <img src="https://placehold.co/40x40" alt="Logo" className="w-10 h-10" />
                </div>
                {/* Sidebar Menu */}
                <ul className="flex flex-col space-y-4">
                    {['Beranda', 'Ajukan Jadwal', 'Progress TA', 'Kalender', 'Profil', 'Logbook', 'Pesan'].map((item, index) => (
                        <li key={index} className="flex items-center">
                            <img src={`${item.toLowerCase().replace(' ', '_')}.svg`} alt={item} className="w-6 h-6" />
                            {sidebarOpen && <span className="ml-4 text-gray-600">{item}</span>}
                        </li>
                    ))}
                </ul>
            </aside>

            {/* Main Content */}
            <main className="main-content flex-1 p-6">
                <header className="header flex justify-between items-center mb-6">
                    <div className="flex items-center space-x-4">
                        <i onClick={toggleSidebar} className="fas fa-bars text-xl text-gray-600 cursor-pointer"></i>
                        <h1 className="text-2xl font-semibold">Dashboard</h1>
                    </div>
                    <div className="flex items-center space-x-4">
                        <i className="fas fa-bell text-xl text-gray-600"></i>
                        <img src="https://placehold.co/40x40" alt="User  Avatar" className="w-10 h-10 rounded-full" />
                    </div>
                </header>
                {/* Other content can go here */}
            </main>
        </div>
    );
};

ReactDOM.render(<App />, document.getElementById('root'));