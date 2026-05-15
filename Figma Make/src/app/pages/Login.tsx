import { useState } from 'react';
import { useNavigate } from 'react-router';
import { LogIn } from 'lucide-react';

export function Login() {
  const navigate = useNavigate();
  const [role, setRole] = useState<'student' | 'teacher' | 'admin'>('student');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleLogin = (e: React.FormEvent) => {
    e.preventDefault();

    // Mock login - redirect based on role
    if (role === 'student') {
      navigate('/dashboard/student');
    } else if (role === 'teacher') {
      navigate('/dashboard/teacher');
    } else {
      navigate('/dashboard/admin');
    }
  };

  return (
    <div className="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50 flex items-center justify-center px-6 py-12">
      <div className="w-full max-w-md">
        {/* Logo */}
        <div className="text-center mb-8">
          <div className="inline-flex items-center gap-2 mb-4">
            <div className="w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center">
              <span className="text-white font-bold text-2xl">S</span>
            </div>
            <span className="font-semibold text-3xl text-foreground">Syntra</span>
          </div>
          <p className="text-muted-foreground">Platform Monitoring PKL Modern</p>
        </div>

        {/* Login Card */}
        <div className="bg-white rounded-2xl p-8 shadow-lg border border-border">
          <div className="mb-6">
            <h2 className="text-2xl font-bold text-foreground mb-2">Selamat Datang</h2>
            <p className="text-muted-foreground">Masuk ke akun Syntra Anda</p>
          </div>

          <form onSubmit={handleLogin} className="space-y-6">
            {/* Role Selection */}
            <div className="space-y-2">
              <label className="text-sm text-foreground">Login sebagai</label>
              <div className="grid grid-cols-3 gap-2">
                <button
                  type="button"
                  onClick={() => setRole('student')}
                  className={`py-2 px-3 rounded-lg border transition-all ${
                    role === 'student'
                      ? 'bg-blue-50 border-blue-500 text-blue-700'
                      : 'bg-white border-border text-muted-foreground hover:border-blue-300'
                  }`}
                >
                  Siswa
                </button>
                <button
                  type="button"
                  onClick={() => setRole('teacher')}
                  className={`py-2 px-3 rounded-lg border transition-all ${
                    role === 'teacher'
                      ? 'bg-blue-50 border-blue-500 text-blue-700'
                      : 'bg-white border-border text-muted-foreground hover:border-blue-300'
                  }`}
                >
                  Guru
                </button>
                <button
                  type="button"
                  onClick={() => setRole('admin')}
                  className={`py-2 px-3 rounded-lg border transition-all ${
                    role === 'admin'
                      ? 'bg-blue-50 border-blue-500 text-blue-700'
                      : 'bg-white border-border text-muted-foreground hover:border-blue-300'
                  }`}
                >
                  Admin
                </button>
              </div>
            </div>

            {/* Email */}
            <div className="space-y-2">
              <label htmlFor="email" className="text-sm text-foreground">
                Email
              </label>
              <input
                id="email"
                type="email"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                placeholder="nama@email.com"
                required
                className="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>

            {/* Password */}
            <div className="space-y-2">
              <label htmlFor="password" className="text-sm text-foreground">
                Password
              </label>
              <input
                id="password"
                type="password"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
                placeholder="••••••••"
                required
                className="w-full px-4 py-3 rounded-lg border border-border bg-input-background focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>

            <button
              type="submit"
              className="w-full px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:opacity-90 transition-opacity flex items-center justify-center gap-2"
            >
              <LogIn size={20} />
              Masuk
            </button>
          </form>

          <div className="mt-6 text-center">
            <a href="/" className="text-sm text-blue-600 hover:underline">
              Kembali ke Beranda
            </a>
          </div>
        </div>
      </div>
    </div>
  );
}
