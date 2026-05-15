import { Users, Building2, GraduationCap, BarChart3, LogOut } from 'lucide-react';
import { useNavigate } from 'react-router';

export function AdminDashboard() {
  const navigate = useNavigate();

  return (
    <div className="min-h-screen bg-background">
      {/* Header */}
      <header className="bg-white border-b border-border">
        <div className="px-6 py-4">
          <div className="flex items-center justify-between">
            <div className="flex items-center gap-3">
              <div className="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center">
                <span className="text-white font-bold text-lg">S</span>
              </div>
              <div>
                <h1 className="font-semibold text-lg text-foreground">Syntra</h1>
                <p className="text-xs text-muted-foreground">Dashboard Admin</p>
              </div>
            </div>
            <button
              onClick={() => navigate('/')}
              className="flex items-center gap-2 px-4 py-2 text-muted-foreground hover:text-foreground transition-colors"
            >
              <LogOut size={18} />
              Keluar
            </button>
          </div>
        </div>
      </header>

      <div className="max-w-7xl mx-auto px-6 py-8">
        {/* Welcome Section */}
        <div className="mb-8">
          <h2 className="text-3xl font-bold text-foreground mb-2">Dashboard Admin</h2>
          <p className="text-muted-foreground">Overview sistem monitoring PKL</p>
        </div>

        {/* Stats Cards */}
        <div className="grid md:grid-cols-4 gap-6 mb-8">
          <div className="bg-white rounded-xl p-6 border border-border">
            <div className="flex items-center gap-3 mb-2">
              <div className="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <Users className="text-blue-600" size={20} />
              </div>
              <div>
                <p className="text-2xl font-bold text-foreground">245</p>
                <p className="text-sm text-muted-foreground">Total Siswa PKL</p>
              </div>
            </div>
          </div>

          <div className="bg-white rounded-xl p-6 border border-border">
            <div className="flex items-center gap-3 mb-2">
              <div className="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <GraduationCap className="text-green-600" size={20} />
              </div>
              <div>
                <p className="text-2xl font-bold text-foreground">18</p>
                <p className="text-sm text-muted-foreground">Guru Pembimbing</p>
              </div>
            </div>
          </div>

          <div className="bg-white rounded-xl p-6 border border-border">
            <div className="flex items-center gap-3 mb-2">
              <div className="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                <Building2 className="text-purple-600" size={20} />
              </div>
              <div>
                <p className="text-2xl font-bold text-foreground">67</p>
                <p className="text-sm text-muted-foreground">Perusahaan Mitra</p>
              </div>
            </div>
          </div>

          <div className="bg-white rounded-xl p-6 border border-border">
            <div className="flex items-center gap-3 mb-2">
              <div className="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                <BarChart3 className="text-indigo-600" size={20} />
              </div>
              <div>
                <p className="text-2xl font-bold text-foreground">87%</p>
                <p className="text-sm text-muted-foreground">Avg Completion</p>
              </div>
            </div>
          </div>
        </div>

        <div className="grid lg:grid-cols-2 gap-6">
          {/* Recent Activity */}
          <div className="bg-white rounded-2xl p-6 border border-border">
            <h3 className="text-xl font-semibold text-foreground mb-6">Aktivitas Terbaru</h3>
            <div className="space-y-4">
              {[
                { user: 'Ahmad Fauzi', action: 'Submit jurnal harian', time: '5 menit lalu' },
                { user: 'Siti Nurhaliza', action: 'Jurnal disetujui pembimbing', time: '12 menit lalu' },
                { user: 'Budi Santoso', action: 'Update progress PKL', time: '1 jam lalu' },
                { user: 'Dewi Lestari', action: 'Submit jurnal harian', time: '2 jam lalu' },
              ].map((activity, idx) => (
                <div key={idx} className="flex items-center gap-4 p-3 rounded-lg bg-muted/30">
                  <div className="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center flex-shrink-0">
                    <span className="text-white font-semibold text-sm">{activity.user.charAt(0)}</span>
                  </div>
                  <div className="flex-1">
                    <p className="text-sm font-medium text-foreground">{activity.user}</p>
                    <p className="text-sm text-muted-foreground">{activity.action}</p>
                  </div>
                  <span className="text-xs text-muted-foreground">{activity.time}</span>
                </div>
              ))}
            </div>
          </div>

          {/* Top Companies */}
          <div className="bg-white rounded-2xl p-6 border border-border">
            <h3 className="text-xl font-semibold text-foreground mb-6">Perusahaan Mitra Teratas</h3>
            <div className="space-y-4">
              {[
                { company: 'PT Digital Solutions', students: 32, rating: 4.8 },
                { company: 'CV Tech Innovate', students: 28, rating: 4.7 },
                { company: 'PT Maju Jaya', students: 24, rating: 4.6 },
                { company: 'PT Creative Studio', students: 21, rating: 4.9 },
              ].map((company, idx) => (
                <div key={idx} className="flex items-center justify-between p-4 rounded-lg bg-muted/30">
                  <div className="flex items-center gap-3">
                    <div className="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                      <Building2 className="text-purple-600" size={20} />
                    </div>
                    <div>
                      <p className="font-medium text-foreground">{company.company}</p>
                      <p className="text-sm text-muted-foreground">{company.students} siswa</p>
                    </div>
                  </div>
                  <div className="text-right">
                    <p className="font-semibold text-foreground">{company.rating}</p>
                    <p className="text-xs text-muted-foreground">Rating</p>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
